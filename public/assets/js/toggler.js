// Toggling function
function toggleSection(section) {
    if (section.style.display == 'flex') {
        section.style.display = 'none';
    } else {
        section.style.display = 'flex';
    }
}

// About me section toggler
const aboutMeSection = document.getElementById('about-me-section');
document.getElementById('aboutmetoggler').addEventListener('click', function() {
    toggleSection(aboutMeSection);
}, false);

// Skills section toggler
const skillsSection = document.getElementsByClassName('skills-section');
document.getElementById('skills-toggler').addEventListener('click', function() {
    for (let i = 0; i < skillsSection.length; i += 1) {
        toggleSection(skillsSection[i]);
        if (skillsSection[i].style.display != 'none') {
            skillsSection[i].addEventListener('click', function() {
                toggleSection()
            }, false);
        }
    }
}, false);

// Skill subsection togglers
const hardSkills = document.getElementById('hard-skills');
const skillsColumn = document.getElementsByClassName('column');

const softSkills = document.getElementById('soft-skills');
const softSkillsList = document.getElementById('soft-skills-list');
const softSkillsIllustrations = document.getElementById('soft-skills-illustrations');

if (hardSkills.style.display != 'none') {
    hardSkills.addEventListener('click', function() {
        for (let i = 0; i < skillsColumn.length; i += 1) {
            toggleSection(skillsColumn[i]);
        }
    }, false);
};

if (softSkills.style.display != 'none') {
    softSkills.addEventListener('click', function() {
        toggleSection(softSkillsList);
        toggleSection(softSkillsIllustrations);
    }, false);
};

// Recent Work Toggler
const  maintenance = document.getElementById('maintenance');
document.getElementById('recent-work-toggler').addEventListener('click', function() {
    toggleSection(maintenance);
}, false);

// Career Path Toggler
const careerPathSection = document.getElementById('career-path-section');
document.getElementById('career-path-toggler').addEventListener('click', function() {
    toggleSection(careerPathSection);
}, false);

// Career Path Toggler
const educationalPathSection = document.getElementById('educational-path-section');
document.getElementById('educational-path-toggler').addEventListener('click', function() {
    toggleSection(educationalPathSection);
}, false);