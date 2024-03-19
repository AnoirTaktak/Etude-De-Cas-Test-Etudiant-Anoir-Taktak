<template>
    <table class="table table-striped shadow">
      <thead>
        <tr>
          <th>Libellé</th>
          <th>Adresse</th>
          <th>Modifier</th>
          <th>Supprimer</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="salle in salles" :key="salle.id">
          <td>{{ salle.libelle }}</td>
          <td>{{ salle.adresse }}</td>
          <td>
           <button class="btn btn-primary">Modifier</button>
          </td>
          <td>
            <router-link :to="{name: 'editsalle', params: { id: sal.id }}" ></router-link>
            <button @click="deleteSalle(salle.id)" class="btn btn-danger">Supprimer</button>
          </td>
        </tr>
      </tbody>
    </table>
  </template>

  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  import { useRoute } from 'vue-router';

  const salles = ref([]);

  const getSalles = async () => {
    try {
      const response = await axios.get('/api/salles');
      salles.value = response.data;
      console.log(response.data);
    } catch (error) {
      console.error('Erreur lors de la récupération des salles :', error);
    }
  };

  onMounted(() => {
    getSalles();
  });

  const deleteSalle = async (id) => {
    try {
      await axios.delete(`/api/salles/${id}`);
      salles.value = salles.value.filter(salle => salle.id !== id);
    } catch (error) {
      console.error('Erreur lors de la suppression de la salle :', error);
    }
  };
  </script>
