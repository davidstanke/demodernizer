class Account
  attr_accessor :id, :customer_id, :product_code, :currency_code, :account_number, :balance, :status

  def initialize(attributes = {})
    attributes.each do |k, v|
      send("#{k}=", v) if respond_to?("#{k}=")
    end
  end

  def self.all
    DataStore.transaction(true) do |s|
      s[:accounts] || []
    end
  end

  def self.find(id)
    all.find { |a| a.id == id.to_i }
  end

  def self.create(attributes)
    account = new(attributes)
    account.status ||= "ACTIVE"
    account.balance ||= 0.0
    account.customer_id = account.customer_id.to_i if account.customer_id
    
    DataStore.transaction do |s|
      s[:accounts] ||= []
      s[:_account_seq] ||= 0
      s[:_account_seq] += 1
      account.id = s[:_account_seq]
      account.account_number = "100000#{account.id}"
      s[:accounts] << account
    end
    account
  end

  def update(attributes)
    attributes.each do |k, v|
      send("#{k}=", v) if respond_to?("#{k}=")
    end
    DataStore.transaction do |s|
      accounts = s[:accounts] || []
      idx = accounts.index { |a| a.id == self.id }
      accounts[idx] = self if idx
      s[:accounts] = accounts
    end
    self
  end

  def to_json(*args)
    {
      :id => id,
      :customer_id => customer_id,
      :product_code => product_code,
      :currency_code => currency_code,
      :account_number => account_number,
      :balance => "%.2f" % balance.to_f,
      :status => status
    }.to_json(*args)
  end
end
