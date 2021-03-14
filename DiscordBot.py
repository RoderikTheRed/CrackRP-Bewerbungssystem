import time
import discord
import mysql.connector

class MyClient(discord.Client):
    async def on_ready(self):
        print("Erfolgreich verbunden")
    async def on_message(self, message):
        if message.content.startswith("!sync"):
            await message.channel.send("Daten werden gesynct bitte warten!")
            connection = mysql.connector.connect(
                host = "localhost",
                user = "root",
                password = "",
                database = "test"
            )

            mycursor = connection.cursor()

            player = str(message.author)

            sql = f"SELECT * FROM bewerbungen WHERE DISCORD = '{player}'"

            print(sql)

            mycursor.execute(sql)

            for dsatz in mycursor:
                 await message.author.send(f"Der Status deiner Bewerbung ist: {dsatz[4]}")


            print(f"{message.author} hat sein Bewerbungsformular mit Command {message.content} gesynct!")

client = MyClient()
client.run("xxxx")
