<?php $__env->startSection('content'); ?>
<!--planilha computadores-->
<body style="background: #525151">



<div class="" style="background-color:#525151; max-height:300px;">

    <section id="stats-subtitle">
        <div class="row justify-content-center">
                <div class="col-12 mt-3 mb-3 text-center">
                    <h2 class="text-uppercase" style="color: azure;">Filial <?php echo e($filtro); ?><i class="bi bi-pc-display ml-4" style="font-size:30px;"></i></h2>
                    <p class="mr-5" style="color: rgb(223, 223, 223)">Computadores</p>
                </div>
        </div>
    </section>
</div>

<div class="container-fluid" style="height: 100vh;">

    


    <div class="row ">

                <?php $__currentLoopData = $pc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pcs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(strpos($pcs['contact'],'F0'.$filtro) ): ?>
                    <?php
                        $contador = 1;
                        $host=$array_teste[$pcs['id']];

                        exec("ping " .$host." -n 1  -w 1", $output, $result);

                        //print_r($output);

                    ?>

                        <div class="col-3">
                            <?php if($result == 0): ?>
                            <div class="card text-left " style="background-color: rgb(53, 53, 53);">
                            <?php else: ?>
                            <div class="card text-left " style="background-color: rgb(53, 53, 53); box-shadow: 0px 0px 4px  rgb(194, 19, 7);">
                                <div class="alarme-pc" ></div>

                            <?php endif; ?>
                                <div class="card-body" >
                                    <?php $__currentLoopData = $pc_tv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pctv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($pcs['id']== $pctv['computers_id']): ?>
                                            <div class="row" style="color:azure !important;">
                                                <div class="col-12  text-center" style="color: rgb(161, 161, 161)"><h3 class="mb-4"><?php echo e($pcs['name']); ?></h3></div>

                                                <div class="col-6" >

                                                    <p class="mb-2"><strong >Team viwer</strong></p>
                                                    <p class="mb-2"><strong >Any Desk</strong></p>
                                                    <p class="mb-2"><strong>IP</strong></p>
                                                    <p class="mb-2">Status</p>


                                                </div>
                                                <div class="col-6 text-right">
                                                    <p class="mb-2"><?php echo e($pctv['number']); ?></h5>
                                                    <?php if(empty($pctv['number_any'])): ?>
                                                        <p class="mb-2 text-muted">Sem info.</h5>
                                                    <?php else: ?>
                                                        <p class="mb-2"><?php echo e($pctv['number_any']); ?></h5>
                                                    <?php endif; ?>
                                                    <p class="mb-2"> <?php echo e($array_teste[$pcs['id']]); ?></p>
                                                    <?php if($result == 0): ?>
                                                    <p style="font-size: 14px"><span class="float-right " style="align-content:end; color:rgb(82, 194, 7);">ONLINE</strong><i class="bi bi-record-fill ml-1" ></i></span></p>
                                                    <?php else: ?>
                                                    <p class="mb-2" style="font-size: 14px"><span class=" float-right" style="align-content:end;color:rgb(194, 19, 7);">OFLINE</strong><i class="bi bi-record-fill ml-1" style="color:rgb(194, 19, 7);"></i></span></p>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(empty($contador)): ?>
                    <style>

                            h1 {
                                font: 2em "Ubuntu", Arial, sans-serif;
                                line-height: 1.5;
                                margin-bottom: .75em;
                            }
                            p, ul {
                                margin-bottom: 1.5em;
                            }
                            ul {
                                margin-left: 1.5em;
                            }
                            main, canvas {
                                display: block;
                            }
                            canvas {
                                display: block;
                                margin: 0 auto 1.5em auto;
                                width: 100%;
                                height: auto;
                                -webkit-tap-highlight-color: transparent;
                            }
                            .wrap {
                                margin: auto;
                                padding: .5em;
                                max-width: 50.5em;
                            }
                            @media (prefers-color-scheme: dark) {
                                body {
                                    background: #242424;
                                    color: #f1f1f1;
                                }

                            }

                    </style>
                        <div class="wrap">
                            <h1>Catapimbas! Nenhum computador foi encontrado.</h1>
                            <canvas width="600" height="312"></canvas>
                            <p>Isso pode ser um problema de sistema ou ainda não foram cadastrados os computadores</p>
                            <p>O que fazer:</p>
                            <ul>
                                <li>Voltar a <a href="/info">Informações</a></li>
                                <li>Verificar junto a equipe se a filial já possui o Fusion Inventory</li>
                            </ul>
                        </div>
                <?php endif; ?>

    </div>

</body>
<script>
    window.addEventListener("DOMContentLoaded",game);

    function game() {
        var canvas = document.querySelector("canvas"),
            c = canvas.getContext("2d"),
            W = canvas.width,
            H = canvas.height,
            S = 2,
            assets = [
                "https://i.ibb.co/dDcTzrQ/nowhere.png",
                "https://i.ibb.co/S7zPTv5/tumbleweed.png"
            ],
            sprites = [],
            score = 0,
            world = {
                friction: 0.1,
                gravity: 0.1
            },
            tumbleweed = {
                inPlay: false,
                x: -160,
                y: 200,
                r: 32,
                rotation: 0,
                xVel: 10,
                yVel: 0,
                mass: 2.5,
                restitution: 0.3
            },
            loadSprite = url => {
                return new Promise((resolve,reject) => {
                    let sprite = new Image();
                    sprite.src = url;
                    sprite.onload = () => {
                        resolve(sprite);
                    };
                    sprite.onerror = () => {
                        reject(url);
                    };
                });
            },
            spritePromises = assets.map(loadSprite),
            applyForce = e => {
                let ex = e.clientX - canvas.offsetLeft,
                    ey = e.clientY - (canvas.offsetTop - window.pageYOffset);

                ex = ex / canvas.offsetWidth * W;
                ey = ey / canvas.offsetHeight * H;

                let insideX = Math.abs(ex - tumbleweed.x) <= tumbleweed.r,
                    insideY = Math.abs(ey - tumbleweed.y) <= tumbleweed.r;

                if (insideX && insideY) {
                    let xForce = tumbleweed.x - ex,
                        yForce = tumbleweed.y - ey,
                        xAccel = xForce / tumbleweed.mass,
                        yAccel = yForce / tumbleweed.mass;

                    tumbleweed.xVel += xAccel;
                    tumbleweed.yVel += yAccel;

                    ++score;

                    // when enabled, the tumbleweed will be allowed to touch the left side after rolling in
                    if (!tumbleweed.inPlay)
                        tumbleweed.inPlay = true;
                }
            },
            update = () => {
                // A. Background
                c.clearRect(0,0,W,H);
                c.drawImage(sprites[0],0,0,W,H);

                // B. Tumbleweed
                tumbleweed.x += tumbleweed.xVel;

                // 1. Friction to the right
                if (tumbleweed.xVel > 0) {
                    tumbleweed.xVel -= world.friction;
                    if (tumbleweed.xVel < 0)
                        tumbleweed.xVel = 0;

                // 2. Friction to the left
                } else if (tumbleweed.xVel < 0) {
                    tumbleweed.xVel += world.friction;
                    if (tumbleweed.xVel > 0)
                        tumbleweed.xVel = 0;
                }

                // 3. Horizontal collision
                let hitLeftBound = tumbleweed.x <= tumbleweed.r && tumbleweed.inPlay,
                    hitRightBound = tumbleweed.x >= W - tumbleweed.r;

                if (hitLeftBound)
                    tumbleweed.x = tumbleweed.r;
                else if (hitRightBound)
                    tumbleweed.x = W - tumbleweed.r;

                if (hitLeftBound || hitRightBound)
                    tumbleweed.xVel *= -tumbleweed.restitution;

                // 4. Vertical collision
                tumbleweed.y += tumbleweed.yVel;
                tumbleweed.yVel += world.gravity;

                let hitTopBound = tumbleweed.y <= tumbleweed.r,
                    hitBottomBound = tumbleweed.y >= H - tumbleweed.r;

                if (hitTopBound) {
                    tumbleweed.y = tumbleweed.r;

                } else if (hitBottomBound) {
                    tumbleweed.y = H - tumbleweed.r;
                    score = 0;
                }
                if (hitTopBound || hitBottomBound)
                    tumbleweed.yVel *= -tumbleweed.restitution;

                // 5. Rotation
                tumbleweed.rotation += tumbleweed.xVel;

                if (tumbleweed.rotation >= 360)
                    tumbleweed.rotation -= 360;
                else if (tumbleweed.rotation < 0)
                    tumbleweed.rotation += 360;

                // 6. Drawing
                c.save();
                c.translate(tumbleweed.x,tumbleweed.y);
                c.rotate(tumbleweed.rotation * Math.PI/180);
                c.drawImage(
                    sprites[1],
                    -tumbleweed.r,
                    -tumbleweed.r,
                    tumbleweed.r * 2,
                    tumbleweed.r * 2
                );
                c.translate(-tumbleweed.x,-tumbleweed.y);
                c.restore();

                // C. Score
                if (score > 0) {
                    c.fillStyle = "#7f7f7f";
                    c.font = "48px Hind, sans-serif";
                    c.textAlign = "center";
                    c.fillText(score,W/2,48);
                }
            },
            render = () => {
                update();
                requestAnimationFrame(render);
            };

        // ensure proper resolution
        canvas.width = W * S;
        canvas.height = H * S;
        c.scale(S,S);

        // load sprites
        Promise.all(spritePromises).then(loaded => {
            for (let sprite of loaded)
                sprites.push(sprite);

            render();
            canvas.addEventListener("click",applyForce);

        }).catch(urls => {
            console.log(urls+" couldn’t be loaded");
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Bugs\resources\views/admin/computadores.blade.php ENDPATH**/ ?>