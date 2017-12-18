#!/bin/sh

SCRIPT=$(readlink -f "$0")
DIR=$(dirname "$SCRIPT")
[ "$1" != "test" ] && psql -U eventz eventz < $DIR/eventz.sql
psql -U eventz eventz_test < $DIR/eventz.sql
