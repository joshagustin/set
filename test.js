// takes class info and submits to php backend
function forwardDataStorage(classNbr, courseID, classSection, subject, description, instructor, schedule) {
    // Store data in sessionStorage (data will persist only for this browser session)
    sessionStorage.setItem('classNbr', classNbr);
    sessionStorage.setItem('courseID', courseID);
    sessionStorage.setItem('subject', subject);
    sessionStorage.setItem('description', description);
    sessionStorage.setItem('instructor', instructor);
    
    // Redirect to the next page
    window.location.href = 'eval.html';
}

const keys = ['classNbr', 'courseID', 'subject', 'description', 'instructor'];

keys.forEach(key => {
    const value = sessionStorage.getItem(key);
    const info = document.querySelector(`.${key} .info`);
    if (info) info.textContent = value;
});

// const classNbr = sessionStorage.getItem('classNbr');
// let info = document.querySelector('.classNumber .info');
// info.textContent = classNbr;

// const courseID = sessionStorage.getItem('courseID');
// info = document.querySelector('.courseID .info');
// info.textContent = courseID;

// const subject = sessionStorage.getItem('subject');
// info = document.querySelector('.subject .info');
// info.textContent = subject;

// const description = sessionStorage.getItem('description');
// info = document.querySelector('.description .info');
// info.textContent = description;

// const instructor = sessionStorage.getItem('instructor');
// info = document.querySelector('.instructor .info');
// info.textContent = instructor;