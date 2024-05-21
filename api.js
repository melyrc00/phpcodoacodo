
//peliculas tendencia


let contenedorPelisTendencias = document.getElementById("contenedor-pelis-tendencias")


const options = {
    method: 'GET',
    headers: {
      accept: 'application/json',
      Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJlMzIyMmQ3YmFjOGU4ZmQ1M2IwZjhmYjI4YmE4ZmQ5OCIsInN1YiI6IjY2NGJjZmNkYTg3YjJlYTBhMzY2NTc1MCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.qq7dbKf5QNFJnzVwBz17L8RxqquMq4hJoVtsy4JXDIU'
    }
  };
  
  fetch('https://api.themoviedb.org/3/movie/popular?', options)
    .then(response => response.json())
    .then(data=>{

    console.log(data)
    console.log(data.results)


    data.results.forEach((movie) => {

        const contenedorCreado = document.createElement('div')

        contenedorCreado.innerHTML = `

            <img class="peli-tendencias" src="https://image.tmdb.org/t/p/w500/${movie.poster_path}">
            <h3 >${movie.title}</h3>
            
        `;


        contenedorPelisTendencias.append(contenedorCreado)


    });

})


// peliculas aclamadas



let contenedorPelisAclamadas = document.getElementById("contenedor-pelis-aclamadas")


const options2 = {
    method: 'GET',
    headers: {
      accept: 'application/json',
      Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJlMzIyMmQ3YmFjOGU4ZmQ1M2IwZjhmYjI4YmE4ZmQ5OCIsInN1YiI6IjY2NGJjZmNkYTg3YjJlYTBhMzY2NTc1MCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.qq7dbKf5QNFJnzVwBz17L8RxqquMq4hJoVtsy4JXDIU'
    }
  };
  
  fetch('https://api.themoviedb.org/3/movie/upcoming', options2)
    .then(response => response.json())
    .then(data=>{

    console.log(data)
    console.log(data.results)


    data.results.forEach((movie) => {

        const contenedorCreadoAcla = document.createElement('div')

        contenedorCreadoAcla.innerHTML = `

            <img class="peli-tendencias" src="https://image.tmdb.org/t/p/w500/${movie.poster_path}">
            <h3 >${movie.title}</h3>
            
        `;


        contenedorPelisAclamadas.append(contenedorCreadoAcla)


    });

})
