import discord
from discord.ext import commands

bot = commands.Bot(command_prefix="ПРЕФИКС для команд")

@bot.command()
async def hello(ctx):
    await ctx.send("Привет, мир!")

bot.run(token="ТОКЕН ВЗЯТЫЙ С САЙТА, см. https://discord.com/developers/applications/")