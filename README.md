```bash
███╗   ██╗███████╗ ██████╗ ██╗  ██╗     ██╗                     
████╗  ██║██╔════╝██╔═══██╗██║  ██║     ██║                     
██╔██╗ ██║█████╗  ██║   ██║███████║     ██║                     
██║╚██╗██║██╔══╝  ██║   ██║╚════██║██   ██║                     
██║ ╚████║███████╗╚██████╔╝     ██║╚█████╔╝                     
╚═╝  ╚═══╝╚══════╝ ╚═════╝      ╚═╝ ╚════╝                      
                                                                
███████╗██╗   ██╗███╗   ███╗███████╗ ██████╗ ███╗   ██╗██╗   ██╗
██╔════╝╚██╗ ██╔╝████╗ ████║██╔════╝██╔═══██╗████╗  ██║╚██╗ ██╔╝
███████╗ ╚████╔╝ ██╔████╔██║█████╗  ██║   ██║██╔██╗ ██║ ╚████╔╝ 
╚════██║  ╚██╔╝  ██║╚██╔╝██║██╔══╝  ██║   ██║██║╚██╗██║  ╚██╔╝  
███████║   ██║   ██║ ╚═╝ ██║██║     ╚██████╔╝██║ ╚████║   ██║   
╚══════╝   ╚═╝   ╚═╝     ╚═╝╚═╝      ╚═════╝ ╚═╝  ╚═══╝   ╚═╝   
                                                                
 █████╗ ██████╗ ██████╗                                         
██╔══██╗██╔══██╗██╔══██╗                                        
███████║██████╔╝██████╔╝                                        
██╔══██║██╔═══╝ ██╔═══╝                                         
██║  ██║██║     ██║                                             
╚═╝  ╚═╝╚═╝     ╚═╝                
```
This repository contains a Symfony-based client for interacting with a Neo4j database using the Object Graph Mapping (OGM) approach. The client leverages the power of Symfony's framework and integrates with the Neo4j database using the Neo4j OGM library.

# Features

   - Connect to a Neo4j database using the OGM approach.
   - Perform CRUD (Create, Read, Update, Delete) operations on entities mapped to the database.
   - Query and retrieve data using the Cypher query language.
   - Utilize Symfony's Dependency Injection container for managing dependencies.
   - Leverage Symfony's validation component for validating entities before persisting them.

# Prerequisites

   - PHP 7.4 or higher
   - Composer
   - Symfony 5.x or higher
   - Neo4j database

# Installation

   - Clone this repository to your local machine.
   - Run composer install to install the required dependencies.
   - Configure the database connection in the .env file using the appropriate Neo4j credentials.
   - Optionally, adjust other settings in the config/packages directory to suit your needs.

# Usage

  - Define your entity classes in the src/Entity directory, following the Symfony and Neo4j OGM conventions.
  - Create repositories for your entities in the src/Repository directory.
  - Use the provided services and classes to interact with the Neo4j database.

    Refer to the Symfony and Neo4j OGM documentation for more details on entity mapping and usage.
