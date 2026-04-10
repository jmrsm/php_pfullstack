var searchBtn = document.getElementById('searchBtn');
var pokemonInput = document.getElementById('pokemonInput');
var pokemonCard = document.getElementById('pokemonCard');
var errorMessage = document.getElementById('errorMessage');


var pokeName = document.getElementById('pokeName');
var pokeImg = document.getElementById('pokeImg');
var pokeId = document.getElementById('pokeId');
var pokeType = document.getElementById('pokeType');

async function searchPokemon() {
    var name = pokemonInput.value.toLowerCase().trim();
    
    if (!name) return;

    try {
        errorMessage.classList.add('hidden');
        pokemonCard.classList.add('hidden');

        var response = await fetch(`https://pokeapi.co/api/v2/pokemon/${name}`);
        
        if (!response.ok) throw new Error("No encontrado");

        var data = await response.json();


        pokeName.textContent = data.name;
        pokeId.textContent = data.id;
        pokeImg.src = data.sprites.front_default;

        var types = data.types.map(t => t.type.name).join(', ');
        pokeType.textContent = types;

        pokemonCard.classList.remove('hidden');

    } catch (err) {
        errorMessage.classList.remove('hidden');
    }
}

searchBtn.addEventListener('click', searchPokemon);
pokemonInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') searchPokemon();
});