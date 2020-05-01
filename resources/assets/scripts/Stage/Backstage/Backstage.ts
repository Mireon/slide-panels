import BackstageVision from './BackstageVision';

/**
 * ...
 */
class Backstage {
    /**
     * ...
     */
    private vision: BackstageVision;

    /**
     * The constructor.
     */
    constructor() {
        this.vision = new BackstageVision();
    }

    /**
     * ...
     *
     * @return void
     */
    public show() {
        this.vision.show();
    }

    /**
     * ...
     *
     * @return void
     */
    public hide() {
        this.vision.hide();
    }
}

export default Backstage;
