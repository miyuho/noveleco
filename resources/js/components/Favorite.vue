<template>
  
    <button
      type="button"
      class="action-icon btn p-0"
    >
        <i class="fas fa-star"
           :class="{'icon-favorite':this.isFavorite}"
           @click="clickFavorite"
        ></i>
    </button>
    
</template>

<script>
  export default {
    props: {
      initialIsFavorite: {
        type: Boolean,
        default: false,
      },
      initialCountFavorites: {
        type: Number,
        default: 0,
      },
      authorized: {
        type: Boolean,
        default: false,
      },
      endpoint: {
        type: String,
      },
    },
    data() {
      return {
        isFavorite: this.initialIsFavorite,
        countFavorites: this.initialCountFavorites,
        gotToFavorite: false,
      }
    },
    methods: {
      clickFavorite() {
        if (!this.authorized) {
          alert('お気に入り機能はログイン中のみ使用できます')
        return
        }
        this.isFavorite
          ? this.unfavorite()
          : this.favorite()
      },
      async favorite() {
        const response = await axios.put(this.endpoint)
        this.isFavorite = true
        this.countFavorites = response.data.countFavorites
        this.gotToFavorite = true
      },
      async unfavorite() {
        const response = await axios.delete(this.endpoint)
        this.isFavorite = false
        this.countFavorites = response.data.countFavorites
        this.gotToFavorite = false
      },
    },
  }
</script> 