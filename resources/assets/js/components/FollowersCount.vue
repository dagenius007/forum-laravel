<template>
	<!-- <button type='submit' :class='classes' @click='toggle'>
		<span class='glyphicon glyphicon-heart'></span>
		<span v-text='count'></span>
	</button> -->
    <div></div>
    
</template>

<script>
export default {
	props: [
		'followerscount'
	],
	data(){
		return {
			followersCount : this.followerscount,
		}
	},
	mounted: function(){
		console.log(this.followersCount);
	},
	computed: {
		
		endpoint(){
            return "/profiles/" + this.user + "/follow";
		}
	},
	methods: {
		follow(){
			axios.get("/profiles/" + this.user+ "/follow");
			this.isFollowing = true;
		}
		
	}
}
</script>