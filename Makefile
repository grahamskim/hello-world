default:

build:
	docker build -t grahamskim/hello_world:latest .
	docker tag grahamskim/hello_world:latest grahamskim/hello_world:$$(git rev-parse --verify HEAD)

push:
	docker push grahamskim/hello_world:latest
	docker push grahamskim/hello_world:$$(git rev-parse --verify HEAD)
