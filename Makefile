default:

build:
	docker build -t grahamskim/hello-world:latest .
	docker tag grahamskim/hello-world:latest grahamskim/hello-world:$$(git rev-parse --verify HEAD)

push: build
	docker push grahamskim/hello-world:latest
	docker push grahamskim/hello-world:$$(git rev-parse --verify HEAD)

deploy:
	kubectl set image deployments/hello-world hello-world=grahamskim/hello-world:$$(git rev-parse --verify HEAD) -n public
