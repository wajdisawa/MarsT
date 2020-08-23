# MarsT service
is a microservice that takes the earth time and date in UTC and return mars sol date (MSD) and martian coordinated time (MTC).


## Commands
- Build the service and keep track the logs 
`make buils` 
- Run the service
`make run`
- Get inside the docker container, for the service (not the nginx container)
`make enter`
- Run service tests
`make test`
- Run code static analysis 
`make static-analysis`

For more commands check `make help`.

## Run Service
After `make run`, with the current configuration for the service, we can call the service as:

    curl --location --request POST 'http://localhost:9090/time' \
	--header 'Content-Type: application/json' \
	--form 'timeUTC=20 Aug 2020 07:15:10 UTC'
