# Drupal Rollbar

Adds Rollbar error reporting to Drupal 8.

## Installation

```bash
composer require gwa/drupal_rollbar
```

## Setup

Set an environment variable (that can be read using `getenv()`) containing the Rollbar access token:

```
ROLLBAR_ACCESS_TOKEN [access_token]
```

### Environment

Environment defaults to `production`.

Override with an environment variable:

```
ROLLBAR_ENVIRONMENT staging
```
