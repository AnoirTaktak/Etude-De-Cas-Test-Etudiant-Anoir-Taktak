<template>
    <form @submit.prevent="addSpectacle">
      <h6>Ajout de Spectacle</h6>
      <div class="row">
        <div class="col-md-3">
          <label for="piece" class="form-label">Pièce</label>
          <select class="form-control" v-model="spectacle.idpiece">
            <option v-for="piece in pieces" :key="piece.id" :value="piece.id">{{ piece.titre }}</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="salle" class="form-label">Salle</label>
          <select class="form-control" v-model="spectacle.idsalle">
            <option v-for="salle in salles" :key="salle.id" :value="salle.id">{{ salle.libelle }}</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="date" class="form-label">Date du Spectacle</label>
          <input type="date" class="form-control" id="date" v-model="spectacle.datespectacle">
        </div>
      </div>
      <br/>
      <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
    </form>
  </template>
<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();
const spectacle = ref({});
const salles = ref([]);
const pieces = ref([]);

const getPieces = async () => {
  try {
    const response = await axios.get('/api/pieces'); // Remplacez '/api/pieces' par l'URL de votre API pour récupérer les pièces
    pieces.value = response.data;
  } catch (error) {
    console.error('Erreur lors de la récupération des pièces :', error);
  }
};

const getSalles = async () => {
  try {
    const response = await axios.get('/api/salles'); // Remplacez '/api/salles' par l'URL de votre API pour récupérer les salles
    salles.value = response.data;
  } catch (error) {
    console.error('Erreur lors de la récupération des salles :', error);
  }
};

onMounted(() => {
  getSalles();
  getPieces();
});

const addSpectacle = async () => {
  try {
    console.log(spectacle.value);
    await axios.post('http://localhost:8000/api/spectacles', spectacle.value); // URL de votre API pour ajouter un spectacle
    router.push({ name: 'viewspectacles' });
  } catch (error) {
    console.error('Erreur lors de l\'ajout du spectacle :', error);
  }
};
</script>
