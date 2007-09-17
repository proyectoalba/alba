#!/bin/sed -f

# 	Se deben reemplazar expresiones de la forma:
# 		day.php?cal={CAL}&amp;getdate={NEXT_DAY}
# 	por expresiones
# 		dominio/module/verPorX/date/20070917

s/\(.*href=\)\("\|'\)day\.php\?.*getdate=\({\w*}\)\2\(.*\)/\1\2{DAY_VIEW_ACTION}\/date\/\3\2\4/
s/\(.*href=\)\("\|'\)week\.php\?.*getdate=\({\w*}\)\2\(.*\)/\1\2{WEEK_VIEW_ACTION}\/date\/\3\2\4/
s/\(.*href=\)\("\|'\)month\.php\?.*getdate=\({\w*}\)\2\(.*\)/\1\2{MONTH_VIEW_ACTION}\/date\/\3\2\4/
s/\(.*href=\)\("\|'\)year\.php\?.*getdate=\({\w*}\)\2\(.*\)/\1\2{YEAR_VIEW_ACTION}\/date\/\3\2\4/