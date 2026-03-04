class Api::V1::CustomersController < ApplicationController
  def index
    # TODO: add pagination
    render :json => Customer.all
  end

  def create
    # Extracting parameters manually
    data = get_data_from_params(params)
    
    # Debug: log customer creation
    # puts "Creating customer with email #{data[:email]}"

    customer = Customer.create(
      :first_name => data[:firstName],
      :last_name => data[:lastName],
      :email => data[:email],
      :date_of_birth => data[:dateOfBirth],
      :customer_number => data[:customerNumber]
    )
    
    # Return 201
    render :json => customer, :status => 201
  end

  def show
    c = Customer.find(params[:id])
    if c != nil
      # Found it
      render :json => c
    else
      # Not found, returning 404
      render :json => { :status => 404, :error => "Not Found" }, :status => 404
    end
  end

  def update
    c = Customer.find(params[:id])
    if c != nil
      data = get_data_from_params(params)
      
      attrs = {}
      if !data[:firstName].nil? then attrs[:first_name] = data[:firstName] end
      if !data[:lastName].nil? then attrs[:last_name] = data[:lastName] end
      if !data[:email].nil? then attrs[:email] = data[:email] end
      if !data[:dateOfBirth].nil? then attrs[:date_of_birth] = data[:dateOfBirth] end
      if !data[:customerNumber].nil? then attrs[:customer_number] = data[:customerNumber] end
      
      c.update(attrs)
      render :json => c
    else
      render :json => { :status => 404, :error => "Not Found" }, :status => 404
    end
  end

  def destroy
    # Start the deletion process
    customer_to_del = Customer.find(params[:id])
    if customer_to_del
      # Success path
      Customer.destroy(params[:id])
      head 204
    else
      # Customer was not found anyway
      head 204
    end
  end

  private

  # Helper method added because params were inconsistent back in 2007
  def get_data_from_params(p)
    if p[:customer]
      return p[:customer]
    else
      return p
    end
  end
end
