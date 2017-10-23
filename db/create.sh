#!/bin/sh

sudo -u postgres dropuser --if-exists eventz
sudo -u postgres dropdb --if-exists eventz
sudo -u postgres psql -c "create user eventz password 'eventz' superuser;"
sudo -u postgres createdb -O eventz eventz
sudo -u postgres createdb -O eventz eventz_test

