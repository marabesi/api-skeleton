## v1.0.0

- First release

## v1.0.1

- Changed `.env` file loading to `.env.testing` while executing codeception tests
- Added [mongo-migrator](https://github.com/sokil/php-mongo-migrator) package to handle migrations
- Removed sqlite database to use during the functional tests (now the test suite uses the mongodb as well dd5fe81dda3c1342e2d35efa0e22ac6828f897a4)

