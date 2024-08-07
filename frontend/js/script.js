// scripts.js
/**
 * ShareABite - Profile Page Script
 * 
 * This script handles dynamic interactions for the user profile page,
 * including updating user details and preferences. It includes:
 * - Enabling editable fields for user name and picture updates
 * - Showing and hiding action buttons (Done, Cancel)
 * - Handling dietary preference selections
 */

document.addEventListener("DOMContentLoaded", function() {
    const updateNameLink = document.getElementById("update-name-link");
    const updatePictureLink = document.getElementById("update-picture-link");
    const doneBtn = document.getElementById("done-btn");
    const cancelBtn = document.getElementById("cancel-btn");
    const firstNameField = document.getElementById("first-name");
    const lastNameField = document.getElementById("last-name");
    const uploadBtn = document.getElementById("upload-btn");
  
    // Show/Hide the Done and Cancel buttons
    function showDoneCancelButtons() {
      doneBtn.classList.remove("hidden");
      cancelBtn.classList.remove("hidden");
    }
  
    function hideDoneCancelButtons() {
      doneBtn.classList.add("hidden");
      cancelBtn.classList.add("hidden");
    }
  
    // Enable editing for name fields
    function enableNameEditing() {
      firstNameField.removeAttribute("readonly");
      lastNameField.removeAttribute("readonly");
      showDoneCancelButtons();
    }
  
    // Enable upload button for picture
    function enablePictureUpload() {
      uploadBtn.classList.remove("hidden");
      showDoneCancelButtons();
    }
  
    // Event listeners for account management links
    updateNameLink.addEventListener("click", function(event) {
      event.preventDefault();
      enableNameEditing();
    });
  
    updatePictureLink.addEventListener("click", function(event) {
      event.preventDefault();
      enablePictureUpload();
    });
  
    // Event listeners for Done and Cancel buttons
    doneBtn.addEventListener("click", function() {
      // Save changes (add save logic here)
      firstNameField.setAttribute("readonly", true);
      lastNameField.setAttribute("readonly", true);
      uploadBtn.classList.add("hidden");
      hideDoneCancelButtons();
    });
  
    cancelBtn.addEventListener("click", function() {
      // Revert changes (add revert logic here)
      firstNameField.setAttribute("readonly", true);
      lastNameField.setAttribute("readonly", true);
      uploadBtn.classList.add("hidden");
      hideDoneCancelButtons();
    });
  
    // Handle dietary preferences
    const preferenceCheckboxes = document.querySelectorAll(".preferences-container input[type='checkbox']");
    const updatePrefBtn = document.getElementById("update-pref-btn");
    const cancelPrefBtn = document.getElementById("cancel-pref-btn");
  
    preferenceCheckboxes.forEach(function(checkbox) {
      checkbox.addEventListener("change", function() {
        updatePrefBtn.classList.remove("hidden");
        cancelPrefBtn.classList.remove("hidden");
      });
    });
  
    updatePrefBtn.addEventListener("click", function() {
      // Save dietary preferences (add save logic here)
      updatePrefBtn.classList.add("hidden");
      cancelPrefBtn.classList.add("hidden");
    });
  
    cancelPrefBtn.addEventListener("click", function() {
      // Revert dietary preferences (add revert logic here)
      updatePrefBtn.classList.add("hidden");
      cancelPrefBtn.classList.add("hidden");
    });
  });
  