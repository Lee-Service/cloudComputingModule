FROM ubuntu:latest

#add crontab file to cron directory
ADD crontab /etc/cron.d/hello-cron

#give execution rights on cron job
RUN chmod 755 /etc/cron.d/hello-cron

# Create log file to run tail
RUN touch /var/log/cron.log

#install cron
RUN apt-get update
RUN apt-get -y install cron

#install curl for URLs
RUN apt-get update
RUN apt-get -y install curl

# Run the command on container startup
CMD cron && tail -f /var/log/cron.log