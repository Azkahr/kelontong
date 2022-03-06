<style>
  @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
  .loader {
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0px;
    left: 0px;
    z-index: 1000;
    background-color: white;
  }
  .loader p {
    font-family: "Montserrat", sans-serif;
    font-weight: 600;
    font-size: 30px;
    margin: 0px 0px 0px 15px;
  }

  .loader p span {
    animation-name: dots;
    animation-duration: 0.4s;
    animation-direction: alternate;
    animation-iteration-count: infinite;
    animation-timing-function: ease-in-out;
    position: relative;
    animation-delay: 0s;
  }

  @keyframes dots {
    0% {
      bottom: 0px;
    }
    100% {
      bottom: 3px;
    }
  }
</style>

<div class="loader">
    <p>
      KELONTONG<span>.</span><span style="animation-delay: 0.2s">.</span
      ><span style="animation-delay: 0.4s">.</span>
    </p>
</div>
