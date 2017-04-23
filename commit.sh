# Arquivo para controle de versões (gitHub)




echo "Digite o commit: "
read commit

echo "Digite o apelido destino (branco para \"master\")"
read master

git add .

git commit -m "$commit"

git push tcc-coruja-2 $master

echo "Fim ;)"
