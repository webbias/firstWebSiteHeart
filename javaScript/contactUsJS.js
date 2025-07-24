

//   <!-- floating window js-->
        const windowElement = document.getElementById('window');
        const header = windowElement.querySelector('.window-header');
        const content = document.getElementById('windowContent');
        const minimizeBtn = document.getElementById('minimizeBtn');
        const closeBtn = document.getElementById('closeBtn');

        let isDragging = false;
        let initialX, initialY;

        header.addEventListener('mousedown', startDragging);
        document.addEventListener('mouseup', stopDragging);
        document.addEventListener('mousemove', drag);

        function startDragging(e) {
            if (e.target === minimizeBtn) return;
            isDragging = true;
            initialX = e.clientX - windowElement.getBoundingClientRect().left;
            initialY = e.clientY - windowElement.getBoundingClientRect().top;
            e.preventDefault();
        }

        function stopDragging() {
            isDragging = false;
        }

        function drag(e) {
            if (!isDragging) return;

            const newX = e.clientX - initialX;
            const newY = e.clientY - initialY;
            windowElement.style.left = `${newX}px`;
            windowElement.style.top = `${newY}px`;
        }
        minimizeBtn.addEventListener('click', () => {
            if (content.style.display === 'none') {
                content.style.display = 'block';
                minimizeBtn.textContent = '-';
            } else {
                content.style.display = 'none';
                minimizeBtn.textContent = '+';
            }
        });

        // closeBtn.addEventListener('click', () => {
        //   windowElement.style.display = 'none';
        // });


//   <!-- java script client-side validation -->

    // listens for when the submit button is pressed before running code

  document.getElementById('Contact_Us_form').addEventListener('submit', function(event) {

    // Stop the form from submitting immediately
    event.preventDefault();
    // Retrieves the values entered by the user from the form fields. trim() removes leading and trailing whitespace. For Gender, it selects the radio button that is currently checked (if any).

    const firstName = document.getElementById('First_name').value.trim();
    const lastName = document.getElementById('Last_name').value.trim();
    const Gender = document.querySelector('input[name="Gender"]:checked');

    const email = document.getElementById('Email_Address').value.trim();
    const description = document.getElementById('Problem-Description').value.trim();

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    // This is a regular expression (regex) stored in a constant called emailPattern.
    
    // It's used to validate if an email address has a basic correct format.



    // Breakdown of the regex:
    // Part	Meaning
      // ^	Start of the string
      // [^\s@]+	One or more characters that are NOT whitespace (\s) or @
      // @	The literal "@" symbol
      // [^\s@]+	One or more characters that are NOT whitespace or @ (the domain name part)
      // \.	A literal dot . (escaped because . means any char in regex)
      // [^\s@]+	One or more characters that are NOT whitespace or @ (the domain extension, e.g., "com")
      // $	End of the string
// It's like a template or formula you use to find, match, or manipulate specific parts of text.
// It lets you specify complex rules for what text to find — for example, all email addresses, phone numbers, words starting with "a", ending with the word "grant", having "exe" in any part of it,  etc.

    let errors = [];
    // Initializes an empty array to store error messages

    // validation
    if (!firstName) {errors.push("First Name is required.");}
    if (!lastName) {errors.push("Last Name is required.");}
    if (!Gender) {errors.push("Please select a gender.");}
    if (!email){
      errors.push("Email Address is required.");
    } else if (!emailPattern.test(email)) {
      errors.push("Email Address format is invalid.");
    }
    if (!description) {errors.push("Problem/Description is required.");}
    // Checks each field for empty values.
    // For email, it also checks if the format matches the regex pattern.
    // Any failed check adds a descriptive error message to the errors array.


    if (errors.length > 0) {
      alert(errors.join("\n"));
      // If there are any errors, it shows an alert box listing all errors (each error on a new line).
    } else {
      this.submit();
      // If there are no errors, it submits the form using this.submit().    
    }
    



  });