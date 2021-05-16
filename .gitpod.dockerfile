FROM gitpod/workspace-full-vnc:latest

RUN sudo apt-get update && sudo apt-get upgrade && sudo apt-get install apt-utils
