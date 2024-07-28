 // Get the user-year select element
 const userYearSelect = document.getElementById('user-year');

 // Get the user-division select element
 const userDivisionSelect = document.getElementById('user-division');
 
 // Define division options based on year selection
 const divisions = {
   '1st year': ['FY-A', 'FY-B'],
   '2nd year': ['SY-A', 'SY-B'],
   '3rd year': ['TY-A', 'TY-B'],
   'final year': ['B.Tech-A', 'B.Tech-B']
 };
 
 // Function to populate division options based on selected year
 function populateDivisions() {
   const selectedYear = userYearSelect.value;
   userDivisionSelect.innerHTML = ''; // Clear existing options
 
   if (selectedYear && divisions[selectedYear]) {
     divisions[selectedYear].forEach(division => {
       const option = document.createElement('option');
       option.value = division;
       option.textContent = division;
       userDivisionSelect.appendChild(option);
     });
   } else {
     const defaultOption = document.createElement('option');
     defaultOption.value = '';
     defaultOption.textContent = 'Select Division';
     userDivisionSelect.appendChild(defaultOption);
   }
 }
 
 // Event listener for changes in the user-year selection
 userYearSelect.addEventListener('change', populateDivisions);
 
 // Initially populate division options based on default selection (if any)
 populateDivisions();
 