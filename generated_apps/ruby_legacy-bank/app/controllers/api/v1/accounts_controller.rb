class Api::V1::AccountsController < ApplicationController
  def create
    data = params[:account] || params
    account = Account.create(
      :customer_id => data[:customerId],
      :product_code => data[:productCode],
      :currency_code => data[:currencyCode]
    )
    render :json => account, :status => :created
  end

  def show
    account = Account.find(params[:id])
    if account
      render :json => account
    else
      render :json => { :status => 404, :error => "Not Found" }, :status => :not_found
    end
  end

  def update_status
    account = Account.find(params[:id])
    if account
      data = params[:account] || params
      account.update(:status => data[:status]) if data[:status]
      render :json => account
    else
      render :json => { :status => 404, :error => "Not Found" }, :status => :not_found
    end
  end
end
