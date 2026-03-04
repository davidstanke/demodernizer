# Be sure to restart your server when you modify this file.

# Your secret key for verifying cookie session data integrity.
# If you change this key, all old sessions will become invalid!
# Make sure the secret is at least 30 characters and all random, 
# no regular words or you'll be exposed to dictionary attacks.
ActionController::Base.session = {
  :key         => '_temp_app_session',
  :secret      => 'c6b9ade788dde34c5c8a5d64c3b69a6b6afe93c5b69c8f526b23d72bd3f63d15e8b16be1e7f88a69b2dba3b15672ee08fecfc6edea7e44f343557c7ce4790ef3'
}

# Use the database for sessions instead of the cookie-based default,
# which shouldn't be used to store highly confidential information
# (create the session table with "rake db:sessions:create")
# ActionController::Base.session_store = :active_record_store
