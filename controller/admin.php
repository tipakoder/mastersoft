<?php

function githubUpdate(){
    @system(`git pull`);
}