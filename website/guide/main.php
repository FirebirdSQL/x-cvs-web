<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Introduction</H4>
In August 2000, <A href="http://www.borland.com">Borland Software Corp.</A> (formerly known as Inprise) released the beta version of <A href="http://www.borland.com/interbase">InterBase 6.0</A> as open source. The community of waiting developers and users preferred to establish itself as an independent, self-regulating team rather than submit to the risks, conditions and restrictions that the company proposed for community participation in open source development. A core of developers quickly formed a project and installed its own source tree on SourceForge. They liked the Phoenix logo which was to have been <A href="http://www.ibphoenix.com">ISC's</A> brandmark and adopted the name "Firebird" for the project. 
<p>
Because Borland's open source efforts regarding InterBase never really took off beyond prime release of the source code and the company returned its focus to closed commercial development, Firebird became THE Open Source version of InterBase.
<p>
Although we made many attempts to reunite our efforts with Borland's to strengthen the position of InterBase and its further development, it's obvious (especially in the light of events around recent release of Borland InterBase 6.5) that our definitive divorce is inevitable. <b>So you can see Firebird&trade; as an independent product that's almost 100% compatible with Borland InterBase&reg;.</b> Our intention is to keep backward compatibility with Firebird/InterBase, but we can't guarantee that Firebird will support all InterBase features beyond its version 6.0. Anyway, because Firebird and InterBase user's community overlap in large, we'll always look for ways to facilitate the coexistence of both products, or at least secure the migration path.
<p>
Next: <A href="index.php?op=guide&amp;id=rdbms">Firebird relational database</A>
<p>