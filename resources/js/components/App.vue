<template>
  <div class="container-fluid">
    <Header />
    <main class="container">
      ciao
      <Post />
    </main>
  </div>
</template>

<script>
import Header from "./Header.vue";
export default {
  name: "App",
  components: {
    Header,
  },
};
</script>
