class Api::V1::TransactionsController < ApplicationController
  def create
    data = params[:transaction] || params
    begin
      txn = BankTransaction.create(
        :account_id => data[:accountId],
        :type => data[:type],
        :amount => data[:amount],
        :currency => data[:currency],
        :description => data[:description]
      )
      render :json => txn, :status => :created
    rescue => e
      render :json => { :status => 400, :error => "Bad Request", :message => e.message }, :status => :bad_request
    end
  end

  def index
    txns = BankTransaction.where_account_id(params[:account_id])
    render :json => txns
  end
end
