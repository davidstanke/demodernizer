ActionController::Routing::Routes.draw do |map|
  map.namespace :api do |api|
    api.namespace :v1 do |v1|
      v1.resources :customers
      v1.resources :accounts
      v1.resources :transactions
    end
  end
  
  map.connect 'api/v1/accounts/:id/status', :controller => 'api/v1/accounts', :action => 'update_status', :conditions => { :method => :put }
  map.connect 'api/v1/transactions/account/:account_id', :controller => 'api/v1/transactions', :action => 'index', :conditions => { :method => :get }

  map.root :controller => "home", :action => "index"
end
