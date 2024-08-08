/**
 * profile.js
 * 
 * This JavaScript file handles the dynamic behavior for the user profile page of the ShareABite application.
 * It includes functionalities to:
 * - Make the first and last name fields editable when the "Update Name" link is clicked.
 * - Show a file input for uploading a new user picture when the "Update User Picture" link is clicked.
 * - Smoothly transition the visibility of the "Done" and "Cancel" buttons, as well as the upload button.
 * - Enable dietary preference checkboxes and show update/cancel buttons when changes are made.
 * - Revert changes and restore the original state when the "Cancel" button is clicked.
 * - Handle form submissions to update user information and dietary preferences.
 * 
 * The file uses CSS classes to apply transitions and handle visibility changes, providing a user-friendly 
 * and interactive experience.
 */
 
// JavaScript to handle the dynamic behavior

// Elements
const firstNameInput = document.getElementById('first-name');
const lastNameInput = document.getElementById('last-name');
const updateNameLink = document.getElementById('update-name');
const updatePictureLink = document.getElementById('update-picture');
const doneBtn = document.getElementById('done-btn');
const cancelBtn = document.getElementById('cancel-btn');
const uploadPictureInput = document.getElementById('upload-picture');
const uploadPictureLabel = document.querySelector('.file-input-label');
const dietaryOptions = document.querySelectorAll('.dietary-option');
const updateDietaryBtn = document.getElementById('update-dietary');
const cancelDietaryBtn = document.getElementById('cancel-dietary');

// Initial user data (for cancel functionality)
let initialUserData = {
    firstName: firstNameInput.value,
    lastName: lastNameInput.value,
    dietaryPreferences: Array.from(dietaryOptions).map(option => option.checked)
};

// Function to make name fields editable
function makeEditable() {
    firstNameInput.removeAttribute('readonly');
    firstNameInput.classList.add('editable');
    lastNameInput.removeAttribute('readonly');
    lastNameInput.classList.add('editable');
    doneBtn.classList.remove('hidden');
    cancelBtn.classList.remove('hidden');
}

// Function to cancel changes
function cancelChanges() {
    firstNameInput.setAttribute('readonly', 'readonly');
    firstNameInput.classList.remove('editable');
    lastNameInput.setAttribute('readonly', 'readonly');
    lastNameInput.classList.remove('editable');
    doneBtn.classList.add('hidden');
    cancelBtn.classList.add('hidden');
    uploadPictureLabel.classList.add('hidden');
    uploadPictureInput.classList.add('hidden');
    
    // Revert to initial data
    firstNameInput.value = initialUserData.firstName;
    lastNameInput.value = initialUserData.lastName;
    dietaryOptions.forEach((option, index) => {
        option.checked = initialUserData.dietaryPreferences[index];
    });
    updateDietaryBtn.classList.add('hidden');
    cancelDietaryBtn.classList.add('hidden');
}

// Function to save changes
function saveChanges() {
    // Prepare data for submission
    let updatedUserData = {
        firstName: firstNameInput.value,
        lastName: lastNameInput.value,
        dietaryPreferences: Array.from(dietaryOptions).map(option => option.checked)
    };

    // Example of how to send data to the server using fetch API
    fetch('update_profile.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(updatedUserData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update initial user data with the new changes
            initialUserData = updatedUserData;

            // Revert fields to readonly
            cancelChanges();
        } else {
            alert('An error occurred while saving changes. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });

    // Handle file upload separately if a new picture was selected
    if (uploadPictureInput.files.length > 0) {
        let formData = new FormData();
        formData.append('profile_picture', uploadPictureInput.files[0]);

        fetch('upload_picture.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('user-picture').src = data.picture_url;
            } else {
                alert('An error occurred while uploading the picture. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}

// Event Listeners
updateNameLink.addEventListener('click', makeEditable);

updatePictureLink.addEventListener('click', function() {
    uploadPictureLabel.classList.remove('hidden');
    uploadPictureInput.classList.remove('hidden');
    doneBtn.classList.remove('hidden');
    cancelBtn.classList.remove('hidden');
});

doneBtn.addEventListener('click', saveChanges);
cancelBtn.addEventListener('click', cancelChanges);

dietaryOptions.forEach(option => {
    option.addEventListener('change', function() {
        updateDietaryBtn.classList.remove('hidden');
        cancelDietaryBtn.classList.remove('hidden');
    });
});
