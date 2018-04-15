import random

predictions = []
N = 5

while len(predictions) < N:
	pred = random.randint(0,119)
	if pred not in predictions:
		predictions.append(pred)

show = ""
for pred in predictions:
	show += str(pred)+" "

print show