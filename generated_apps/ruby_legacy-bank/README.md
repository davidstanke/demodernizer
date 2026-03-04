# Legacy Bank - Ruby/Rails 2.3

This application implements the Legacy Bank intranet specification.

## Tech Stack
- **Language:** Ruby 1.8.7
- **Framework:** Ruby on Rails 2.3
- **Database:** PStore (flat-file object serialization)
- **Frontend:** Prototype.js
- **Server:** Mongrel

## How to run

A Dockerfile is provided to encapsulate the legacy Ruby 1.8.7 environment.

1. Build the container image:
   ```sh
   container build --platform linux/amd64 -t ruby18-legacy-bank -f Dockerfile.test .
   ```

2. Run the application:
   ```sh
   container run --rm -p 3000:3000 --platform linux/amd64 -v "$(pwd):/app" -w /app ruby18-legacy-bank ruby script/server mongrel
   ```

The application will be available at `http://localhost:3000`.

## Testing

Tests are written in Playwright. With the server running, from the repository root, run:
```sh
npx playwright test generated_apps/ruby_legacy-bank/test/playwright/legacy-bank.spec.ts
```