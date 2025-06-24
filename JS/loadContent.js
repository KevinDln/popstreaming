let currentPage = {
  'Action': 1,
  'Fantastique': 1,
  'Comedie': 1,
  'Drame': 1,
  'Animation': 1,
  'Mystere': 1
};

// Suppose 3 pages par genre, à ajuster dynamiquement si possible
let totalPages = {
  'Action': 3,
  'Fantastique': 3,
  'Comedie': 3,
  'Drame': 3,
  'Animation': 3,
  'Mystere': 3
};

function updateButtons(genre) {
  const prevBtn = document.getElementById(`${genre.toLowerCase()}-prev`);
  const nextBtn = document.getElementById(`${genre.toLowerCase()}-next`);

  if (currentPage[genre] <= 1) {
    prevBtn.style.display = 'none';
  } else {
    prevBtn.style.display = 'inline';
  }

  if (currentPage[genre] >= totalPages[genre]) {
    nextBtn.style.display = 'none';
  } else {
    nextBtn.style.display = 'inline';
  }
}

function loadNext(genre, event = null) {
  if (event) event.preventDefault();
  if (currentPage[genre] < totalPages[genre]) {
    currentPage[genre]++;
    loadPage(genre);
  }
}

function loadPrev(genre, event = null) {
  if (event) event.preventDefault();
  if (currentPage[genre] > 1) {
    currentPage[genre]--;
    loadPage(genre);
  }
}

function loadPage(genre) {
  fetch(`getContent.php?genre=${genre}&page=${currentPage[genre]}`)
    .then(res => res.json())
    .then(data => {
      const container = document.getElementById(`${genre.toLowerCase()}-container`);
      container.innerHTML = ''; 
      data.forEach(film => {
        const link = document.createElement('a');
        link.href = `strat_video.php?id=${film.id}&type=${film.type}`;  //page => a remplacer, type a récuperer et film.id a initialiser
        const img = document.createElement('img');
        img.src = film.poster_path;
        img.style.width = '180px';
        img.style.margin = '10px';
        
        link.appendChild(img);
        container.appendChild(link);
      });
      updateButtons(genre);
    });
}

window.addEventListener('DOMContentLoaded', () => {
  for (const genre in currentPage) {
    loadPage(genre);
  }
});
