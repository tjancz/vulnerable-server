from diagrams import Diagram, Cluster
from diagrams.onprem.client import User
from diagrams.onprem.database import PostgreSQL
from diagrams.onprem.inmemory import Redis
from diagrams.onprem.network import Nginx
from diagrams.onprem.queue import Kafka
from diagrams.programming.framework import Angular
from diagrams.programming.language import Java

with Diagram("Example Component Diagram for Angular/Java/Microservices Application",  outformat="jpg") as diag:
    with Cluster("Frontend"):
        frontend = Angular("Angular App")

    with Cluster("Backend Services"):
        with Cluster("Java Backend API"):
            backend_api = Java("Spring Boot")

        with Cluster("Microservices"):
            microservices = [Java("Service 1"),
                             Java("Service 2"),
                             Java("Service 3")]

    with Cluster("Infrastructure"):
        nginx = Nginx("Nginx")
        kafka = Kafka("Kafka")
        cache = Redis("Redis Cache")
        db = PostgreSQL("PostgreSQL DB")

    user = User("User")
    user >> nginx >> frontend
    frontend >> backend_api >> db
    backend_api >> cache
    backend_api >> kafka >> microservices
    microservices >> db

diag # This will illustrate the diagram if the environment supports it.
