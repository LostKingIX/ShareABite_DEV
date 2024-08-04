#!/bin/bash

# Create main directories
mkdir -p frontend/{css,js,images} backend/{api,config,classes,utils} codebase/classes/App assets/{images,fonts}

# Create frontend files
touch frontend/{index,user_registration,login,profile,recipe_submission,recipe_list,detailed_recipe,meal_planner,community,about}.php
touch frontend/css/styles.css
touch frontend/js/main.js

# Create backend files
touch backend/api/{user,recipe,meal_plan,community}.php
touch backend/config/database.php
touch backend/classes/{User,Recipe,MealPlan,Community}.class.php
touch backend/utils/{auth,helpers}.php

# Create codebase files
touch codebase/classes/App/{database,page}.class.php

echo "Directory structure created successfully!"
