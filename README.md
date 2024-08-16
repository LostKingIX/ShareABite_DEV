# ShareABite_DEV
This is the development environment that has been setup for Object Oriented Programming III Group 1 - Recipe and Meal Tracking Application. It features the most up-to-date code for tracking group progress and file information.

# ShareABite - Meal Planning and Recipe Discovery Application

Project Overview

ShareABite is a comprehensive web application designed to simplify meal planning, recipe discovery, and grocery shopping. Users can create personalized meal plans, discover and share recipes, track nutritional intake, and generate grocery lists with ease. ShareABite also provides advanced features such as dietary preference filters and a community platform for recipe sharing.
Table of Contents

# Project Overview
Features
Technologies Used
Installation
Usage
API Endpoints
Database Design
Contributing
Testing
Deployment
License
Features

- Personalized Meal Planning: Create and manage personalized meal plans.

- Recipe Discovery: Browse, filter, and discover recipes based on dietary preferences.

- Grocery List Generation: Automatically generate grocery lists based on meal plans.

- Community Features: Share and discover recipes from other users.

- Nutritional Tracking: Track nutritional intake and filter recipes by nutritional needs.

- User Profiles: Customize dietary preferences and manage meal plans.

# Technologies Used
- Frontend: React, HTML5, CSS3, JavaScript
- Backend: Node.js, Express.js, RESTful APIs
- Database: MongoDB (NoSQL)
- Authentication: JWT, Two-Factor Authentication (optional)
- Deployment: Docker, Nginx

# Installation

Clone the repository:
bash
Copy code
git clone https://github.com/LostKingIX/ShareABite_DEV.git

Navigate to the project directory:
bash
Copy code
cd shareabite

Install dependencies:
bash
Copy code
npm install

Set up environment variables:
Create a .env file in the root directory with the following keys:
makefile

Copy code (Once established)
MONGO_URI=your-mongodb-connection-string
JWT_SECRET=your-jwt-secret

Start the development server:
bash
Copy code
npm start

# Usage

- Home Page: View featured recipes and explore different meal categories.

- User Registration and Login: Sign up and log in to access personalized features.

- Meal Planner: Create and save meal plans, which automatically generate grocery lists.

- Community: Share and browse recipes posted by other users.

- User Profiles: Set dietary preferences, track meal plans, and manage saved recipes.

# API Endpoints

User Authentication:
- POST /api/auth/register: Register a new user.
- POST /api/auth/login: Log in an existing user.

Meal Plans:
- GET /api/mealplans: Retrieve user's meal plans.
- POST /api/mealplans: Create a new meal plan.

Recipes:
- GET /api/recipes: Retrieve available recipes.
- POST /api/recipes: Add a new recipe.

# Database Design

Entities:

User: Stores user information, dietary preferences, and profile details.

MealPlan: Manages meal plans created by users, linked to specific dates.

Recipe: Contains detailed information about recipes, including ingredients, cooking steps, and nutritional data.

Ingredient: Stores details of ingredients used in recipes.

Community: Handles user-generated posts and interactions within the community.

ER Diagrams and detailed relationships are described in the database design document located in the docs/ folder.

# License

This project is licensed under the MIT License - see the LICENSE file for details.
