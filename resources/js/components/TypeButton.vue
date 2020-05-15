<template>
  <div>
    <button
      type="button"
      class="btn btn-primary py-2 mr-2 create-component-btn"
      data-toggle="modal"
      data-target="#modal-"
    >créer {{item.title}}</button>
  </div>
</template>

<script>
export default {
  name: "type-button",
  props: ["item"],
  data() {
      return {

      }
  }
};
</script>



