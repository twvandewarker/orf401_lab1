import sys

def main():
	file_name = sys.argv[1]
	search_term = sys.argv[2].replace("\"", "")
	rides = ""

	with open(file_name, "r") as file:
		for line in file:
			name, source_city, source_state, dest_city, dest_state, date, time, multiple, num = line.split("\t")

			if search_term in source_state:
				rides += name + " " + source_city + " " + source_state + " " + dest_city + " " + dest_state + " " + date + " " + time + " " + multiple + " " + num + "<br />"

	print(rides)
	return

if __name__ == "__main__":
    main()
