# For help setting times, users of this crontab can go to https://crontab.guru/
# Example of job definition:
# .---------------- minute (0 - 59) - we use / to step the process for every X number of minutes
# |  .------------- hour (0 - 23)
# |  |  .---------- day of month (1 - 31)
# |  |  |  .------- month (1 - 12) OR jan,feb,mar,apr ...
# |  |  |  |  .---- day of week (0 - 6) (Sunday=0 or 7) OR sun,mon,tue,wed,thu,fri,sat
# |  |  |  |  |
# *  *  *  *  * user-name command to be executed

# * * * * * root /script.sh is a valid example to script cron file / 
# You must have empty line for valid cron file below your actual cron job

Schedule the output of service data via the cron function using the information above:
Cron is scheduled to output service data on a regular basis (every 30 mins) and is ran on Lee Services' Ubuntu VM.