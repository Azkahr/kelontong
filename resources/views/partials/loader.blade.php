<style>
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

.loader span {
    --delay: 0s;
    animation: arrows 1s var(--delay) infinite ease-in;
}

@keyframes arrows {
    0%,
    100% {
        color: black;
        transform: translateY(0);
    }
    50% {
        color: #3ab493;
        transform: translateY(20px);
    }
}
</style>
<div class="loader">
  <span>↓</span>
  <span style="--delay: 0.1s">↓</span>
  <span style="--delay: 0.3s">↓</span>
  <span style="--delay: 0.4s">↓</span>
  <span style="--delay: 0.5s">↓</span>
</div>