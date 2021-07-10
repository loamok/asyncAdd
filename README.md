
# Candidature Développeur PHP
## chronométrage : 
- projet initié le 10/07/2021 à 09:45
- pause de 12h à 14h
- dernier commit le 10/07/2021 à 14:40

## VUE D'ENSEMBLE

Développer un projet sous Symfony 5 permettant de faire des additions de façon asynchrone
avec un service AMQP - Advanced Message Queuing Protocol.

## OBJECTIFS

1. L’utilisateur affiche une page contenant un formulaire permettant de saisir 2 valeurs de nombres entiers positifs et un bouton “submit” pour transmettre les données.
2. A la soumission, un message AMQP contenant les 2 valeurs est publié sur le broker AMQP.
3. Un consommateur AMQP récupère ce message, il effectue l’addition mathématique des 2 valeurs, insère le résultat dans la base de données puis retourne un signal 
4. --confirmation “ACK” au broker AMQP.-- : Les ack sont envoyés automatiquement par Symfony messenger en 5.3.

## SERVICES TIERS NÉCESSAIRES

● Un service web (Par exemple: PHP builtin server)
● Une base de données SQL (Par exemple: MySQL ou MariaDB) :solution retenue : sqlite 3
● Une instance de broker AMQP (Par exemple: RabbitMQ)

# CLASSES PHP À DÉVELOPPER

● 1 controller avec 1 action
● 1 template Twig
● 1 DTO qui décrit les 2 valeurs initiales
● 1 form-type lié au DTO
● 1 consommateur AMQP
● 1 entité qui décrit la valeur résultante
