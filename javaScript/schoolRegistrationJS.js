document.getElementById('School_Registration_Form').addEventListener('submit', function(event) {

  event.preventDefault();

  const S_First_Name = document.getElementById('S_First_Name').value.trim();
  const S_Last_Name = document.getElementById('S_Last_Name').value.trim();
  const Gender = document.querySelector('input[name="Gender"]:checked');

  const email = document.getElementById('S_email').value.trim();
  const S_DOB = document.getElementById('S_DOB').value.trim();
  const Grade = document.getElementById('Grade').value.trim();

  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  let errors = [];

  if (!S_First_Name) {errors.push("First Name is required.");}
  if (!S_Last_Name) {errors.push("Last Name is required.");}
  if (!Gender) {errors.push("Please select a gender.");}
  if (!Grade) {errors.push("Please enter a grade.");}
  if (!email){
    errors.push("Email Address is required.");
  } else if (!emailPattern.test(email)) {
    errors.push("Email Address format is invalid.");
  }
  if (!S_DOB) {errors.push("Date of Birth is required.");}

  if (errors.length > 0) {
    alert(errors.join("\n"));
  } else {
    alert("help!!!");
    this.submit();
  
  }
});