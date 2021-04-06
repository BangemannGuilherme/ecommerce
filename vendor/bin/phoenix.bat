@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../lulco/phoenix/bin/phoenix
php "%BIN_TARGET%" %*
