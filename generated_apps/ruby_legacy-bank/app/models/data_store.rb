require 'pstore'
require_dependency 'customer'
require_dependency 'account'
require_dependency 'bank_transaction'

class DataStore
  def self.store
    @store ||= PStore.new(File.join(Rails.root, 'db', 'legacy_bank.pstore'))
  end

  def self.transaction(read_only = false, &block)
    store.transaction(read_only, &block)
  end
end
