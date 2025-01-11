
<template>
  <div>
    <h1>Category Management</h1>
    <form @submit.prevent="addCategory">
      <input v-model="newCategory" placeholder="Category Name" />
      <button type="submit">Add</button>
    </form>
    <ul>
      <li v-for="category in categories" :key="category.id">
        {{ category.name }}
        <button @click="deleteCategory(category.id)">Delete</button>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      categories: [],
      newCategory: '',
    };
  },
  methods: {
    fetchCategories() {
      axios.get('/categories').then((response) => {
        this.categories = response.data;
      });
    },
    addCategory() {
      axios.post('/categories', { name: this.newCategory }).then(() => {
        this.newCategory = '';
        this.fetchCategories();
      });
    },
    deleteCategory(id) {
      axios.delete(`/categories/${id}`).then(() => {
        this.fetchCategories();
      });
    },
  },
  mounted() {
    this.fetchCategories();
  },
};
</script>
