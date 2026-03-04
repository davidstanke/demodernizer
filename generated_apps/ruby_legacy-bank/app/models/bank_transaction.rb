class BankTransaction
  attr_accessor :id, :account_id, :type, :amount, :currency, :description, :balance_after, :transaction_date

  def initialize(attributes = {})
    attributes.each do |k, v|
      send("#{k}=", v) if respond_to?("#{k}=")
    end
  end

  def self.all
    DataStore.transaction(true) do |s|
      s[:transactions] || []
    end
  end

  def self.where_account_id(account_id)
    all.select { |t| t.account_id == account_id.to_i }
  end

  def self.create(attributes)
    txn = new(attributes)
    txn.account_id = txn.account_id.to_i
    txn.amount = txn.amount.to_f
    txn.transaction_date = Time.now.to_s
    
    DataStore.transaction do |s|
      s[:transactions] ||= []
      s[:accounts] ||= []
      
      account = s[:accounts].find { |a| a.id == txn.account_id }
      raise "Account not found" unless account

      if txn.type == 'WITHDRAWAL' && account.balance < txn.amount
        raise "Insufficient funds"
      end

      if txn.type == 'DEPOSIT'
        account.balance += txn.amount
      elsif txn.type == 'WITHDRAWAL'
        account.balance -= txn.amount
      end

      txn.balance_after = account.balance

      s[:_transaction_seq] ||= 0
      s[:_transaction_seq] += 1
      txn.id = s[:_transaction_seq]
      
      s[:transactions] << txn
    end
    txn
  end

  def to_json(*args)
    {
      :id => id,
      :account_id => account_id,
      :type => type,
      :amount => "%.2f" % amount,
      :currency => currency,
      :description => description,
      :balance_after => "%.2f" % balance_after,
      :transaction_date => transaction_date
    }.to_json(*args)
  end
end
